<?php

namespace CodePress\CodeUser\Models;


use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{

    protected $table = 'codepress_permissions';

    protected $fillable = [
        'name',
        'description',
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
            'name' => 'required',
            'description' => 'required',
        ]);
        $validator->setData($this->attributes);

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }
        return true;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'codepress_permission_roles', 'permission_id', 'role_id');
    }

}
