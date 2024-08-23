<?php

namespace App\Core;



use database\DBConnection;

abstract class Validator{
    protected $messages = [];
    protected $rules = [];
    protected $errorMessages  =[];
    protected  $model;
    protected $data;

    public function __construct(array $messages , array $rules ,$data, $model = null){
        $this->messages =  $messages;
        $this->rules = $rules;
        $this->data = $data;
        if($model)
            $this->model =  $model;
            
        

    }

    public function validate() : bool{





        foreach ($this->rules as $key => $value) {
            
            $filedRules= explode("|", $value);
            $errors = [];

            array_walk($filedRules , function($item) use($key ,& $errors){
                

                $fieldValue = $this->data[$key] ?? null;

                if($item == "required"){                     
                    if(empty($fieldValue))
                        array_push($errors , $this->messages[$key.":required"] ?? $key ." field is required") ;                    
                }else if($item == "unique") {
                    if(!$this->isUnique($key)){
                        array_push($errors , $this->messages[$key.":unique"] ?? $key ." must be unique") ; 
                    }
                }
                else if(str_starts_with($item , "min")){
                    $minLen = (int)explode( ":" , $item)[1];
                    if( strlen($fieldValue) < $minLen)
                        array_push($errors , $this->messages[$key.":min"] ?? "Minimum text length is" . $minLen);                    
                }
                else if(str_starts_with($item , "max")){
                    $maxLen = (int)explode( ":" , $item)[1]; 
                                                         
                    if( strlen($fieldValue) > $maxLen)
                        array_push($errors , $this->messages[$key.":max"] ?? "Max text length is" . $maxLen);
                }
                else if(str_starts_with($item , "regex")){
                    $regex = explode( ":" , $item)[1]; 
                  
                    if(!preg_match($regex, $fieldValue))
                        array_push($errors , $this->messages[$key.":regex"] ?? "Please enter the value with the write format");
                }                                               
            });

            if(count($errors) != 0)
                $this->errorMessages[$key] = $errors;                         
    }

    return count($this->errorMessages) ==0;
      
}   

    private function isUnique($columenName): bool{

        $quary = " SELECT " . $columenName . " FROM " . $this->model . " WHERE " . $columenName . " like '"  . $this->data[$columenName]. "'";
      
        $stmt =  DBConnection::getInstance()->prepare($quary);
        $stmt->execute();
        $ids = $stmt->fetchAll();
        
        

        return count($ids) ==0;
    }

   


    public function errors() : array{
        return  $this->errorMessages;
    }

}