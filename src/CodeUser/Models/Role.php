<?php

namespace CodePress\CodeUser\Models;


use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    const ROLE_EDITOR = "Editor";
    const ROLE_ADMIN = "Admin";
    const ROLE_REDATOR = "Redator";

    protected $table = 'codepress_roles';

    protected $fillable = [
        'name',
    ];

    private $validator;

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param mixed $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    public function isValid()
    {
        $validator = $this->validator;
        $validator->setRules([
            'name' => 'required'
        ]);
        $validator->setData($this->attributes);

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }
        return true;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'codepress_user_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'codepress_permission_roles', 'role_id', 'permission_id');
    }
}
