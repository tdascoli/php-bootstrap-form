# PFBC\Wrapper

wrapper um aus einem file (json) ein formular zu generieren...

## Definition File (json)

```json

{
    "config": {
        "name": "STRING",
        "start": {
            "action": "STRING",
            "method": "ENUM",
            "ajax": "STRING",
            "view": "ENUM",
            "errorView": "ENUM",
            "noLabel": "BOOL",
            "prevent": [
                "ARRAY"
            ]
        },
        // todo: close needs work!
        "close": { // optional, default : { "submit": "true" } --> TBD http://smarttechdo.com/~avb/pfbc/api/#basic-usage-closing-a-form
            "submit": "BOOL", // Form::$SUBMIT
            "buttons": [
                /*
                $buttons = [
                    ["Suspend", "button", ["class" => "btn-danger actionButton", "data-action" => ".."]],
                    ["Delete", "button", ["class" => "btn-danger actionButton", "data-action" => ".."]],
                ];
                */
            ]
        }
    },
    "form": [ // http://smarttechdo.com/~avb/pfbc/api/#element-types-generic-prototype-description
        {
            "id": "STRING",
            "type": "ENUM",
            "label": "STRING",
            "placeholder": "STRING", // NEW
            "helptext": "STRING", // NEW
            "options": "ARRAY",  // Used in elements like Option,Radio,Select. Array could be an associative array or a usual array
            "value": "STRING", // NEW = Initial Value
            "attributes": {
                "append":"STRING",
                "prepend":"STRING",
                "inline":"BOOL",
                "minlength":"INT",
                "shared":"STRING",
                "validation":"OBJECT",
                "inputmask": "STRING", // NEW
                "required":"BOOL", // NEW
                "readonly":"BOOL", // NEW
                "disabled":"BOOL", // NEW
                "privacy":"OBJECT/ENUM" // NEW = needs work
            }
        }
    ]
}

```


## API

*tbd*

```php
Form::wrap("file/on/filesystem/form.json","formId");
Form::wrap("http://url.to/form.json","formId");

Form::Wrapper("file/on/filesystem/form.json","formId");
Form::Wrapper("http://url.to/form.json","formId");
```