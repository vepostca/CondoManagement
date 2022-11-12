<?php
namespace InnovaCondomi\Entities\Base;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Yajra\Auditable\AuditableTrait;

abstract class Identifiable extends Model
{
    use AuditableTrait;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    public function getCreatedByNameAttribute()
    {
        if ($this->{$this->getCreatedByColumn()}) {
            $user = $this->getUserInstance()->find($this->{$this->getCreatedByColumn()});

            return $user->nombres . ' ' . $user->apellidos;
        }

        return '';
    }

    public function getUpdatedByNameAttribute()
    {
        if ($this->{$this->getUpdatedByColumn()}) {
            $user = $this->getUserInstance()->find($this->{$this->getUpdatedByColumn()});

            return $user->nombres . ' ' . $user->apellidos;
        }

        return '';
    }
}