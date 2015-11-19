<?php

namespace cinema;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['id','name', 'email', 'password','sw_activo'];
    protected $hidden = ['password', 'remember_token'];

    private $id;
    private $name;
    private $email;
    private $password;
    private $sw_activo;

    public function setId($id){
        $this->id=$id;
    }
    public function setName($name) {
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setPassword($password) {
        /*if(!empty($password)){
            $password = \Hash::make($password);
        }*/
        $this->password=$password;
    }
    public function getPassword(){

        return $this->password;
    }

    public function setSwActivo($sw_activo) {
        if($sw_activo==true)
        {
            $sw_activo=1;
        }else{
            $sw_activo=0;
        }

        $this->sw_activo=$sw_activo;
    }
    public function getSwActivo(){
        return $this->sw_activo;
    }

    public function guardar()
    {
        User::insert([
            [
                'name'=>$this->name,
                'email' => $this->email,
                'password' => $this->password,
                'sw_activo' =>$this->sw_activo
            ]
        ]);

        return true;
    }

    /**
     *
     */
    public function modificar()
    {
        User::where('id', '=', $this->id)->update([
            'name'=>$this->name,
            'email' => $this->email,
            'password' => $this->password,
            'sw_activo' =>$this->sw_activo
        ]);

        return true;

    }

    public function setPasswordAttribute($valor)
    {
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

}
