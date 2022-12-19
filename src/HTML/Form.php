<?php

    namespace App\HTML;

    final class Form{

        private $data;

        private $errors;

        public function __construct($data, array $errors){
            $this->data = $data;
            $this->errors = $errors;
        }

        private function getValue(string $key){
            if(is_array($this->data)){
                return $this->data[$key] ?? null;
            }
            $method = 'get' . str_replace(' ','', ucwords(str_replace('_',' ',$key)));
            $value =  $this->data->$method();
            if( $value instanceof \DateTimeInterface){
                return $value->format('Y-m-d H:i:s');
            }
            return $value;
        }

        private function getInputClass(string $key): ?string{
            $inputClass = 'form-control';
            if(isset($this->errors[$key])){
                $inputClass .= ' is-invalid';
            }
            return $inputClass;
        }

        private function getErrorFeedback(string $key): ?string{
            if(isset($this->errors[$key])){
                return '<div class="invalid-feedback">
                            '. implode('<br>', $this->errors[$key]).'
                        </div>';
            }
            return '';
        }

        public function input(string $key, string $placeholder = null): string
        {
            $value = $this->getValue($key);
            $type = ($key === "password" || $key === "confirmer_password" || $key === "ancien_password" || $key === "new_password") ? "password" : "text";
            return <<<HTML
            <div class="form-group">
                <input type="{$type}" id="field{$key}" name="{$key}" class="{$this->getInputClass($key)} mb-2" placeholder="{$placeholder}" value="{$value}">
                {$this->getErrorFeedback($key)}
            </div>
HTML;
        }

        
        public function textarea(string $key, string $label): string
        {
            $value = $this->getValue($key);
            return <<<HTML
            <div class="form-group">
                <label for="field{$key}">{$label}</label>
                <textarea type="text" id="field{$key}" rows="8" name="{$key}" class="{$this->getInputClass($key)}">{$value}</textarea>
                {$this->getErrorFeedback($key)}
            </div>
HTML;
        }

        public function select(string $key, string $label, array $options = []){
            $optionsHTML = [];
            $value = $this->getValue($key);

            foreach($options as $k => $v){
                $selected = in_array($k, $value) ? "selected" : "";
                $optionsHTML[] = "<option value=\"$k\" $selected>$v</option>";
            }
            
            $optionsHTML = implode('', $optionsHTML);
            return <<<HTML
            <div class="form-group">
                <label for="field{$key}">{$label}</label>
                <select id="field{$key}" name="{$key}[]" class="{$this->getInputClass($key)}" multiple>
                    {$optionsHTML}
                </select>
                {$this->getErrorFeedback($key)}
            </div>
HTML;
        }

    }

?>