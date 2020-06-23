# authpyk
A library to check Access Control on SSO Payakumbuh

## System Required

Require laravel saml2 auth installed on your laravel project.

## Installation

Require it from "composer":


	$ composer require authpyk/ac

Add the facade aliases in your app configuration file `config/app.php`:

```
'aliases' => [
	      ...
        'CheckAccess' => Authpyk\Ac\CheckAccess::class,
]
```

## Autoloading

By default the Authpyk classes are not loaded automatically. You can autoload your modules using psr-4. For example:
```
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Authpyk\\AC\\": "packages/authpyk/ac/src"
    }
  }
}
```
Tip: don't forget to run composer dump-autoload afterwards.

## Basic Usage

Use this to get access on your module controller:

```
CheckAccess::module(str_replace('Controller','',substr((new \ReflectionClass($this))->getShortName(), 0)), __FUNCTION__);
```

Or you can overwrite the first and the second parameter:

```
CheckAccess::module('moduleName','functionName');
```

## Example

```
  public function index()
  {
      $accessControl = CheckAccess::module(str_replace('Controller','',substr((new \ReflectionClass($this))->getShortName(), 0)), __FUNCTION__);

        if($accessControl){
         
            $access = 'Access granted';
        
        }else{
            
            $access = 'Access denied';
        
        }
        
        return view('rincianaktivitasanjab::index')->with('access',$access);
  }
```

## Licence

This library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
