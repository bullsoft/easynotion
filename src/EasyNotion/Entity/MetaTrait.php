<?php
namespace EasyNotion\Entity;

trait MetaTrait 
{
    public \DateTime   $created_time;
    public PartialUser $created_by;
    public \DateTime   $last_edited_time;
    public PartialUser $last_edited_by;

    public function setCreatedBy(array $val): static
    {
        $this->created_by = new PartialUser(
            Type::from($val['object']),
            $val['id']
        );
        return $this;
    }

    public function setCreatedTime(string $val): static
    {
        $this->created_time = new \DateTime($val);
        return $this;
    }

    public function setLastEditedBy(array $val): static 
    {
        $this->last_edited_by = new PartialUser(
            Type::from($val['object']),
            $val['id']
        );
        return $this;
    }

    public function setLastEditedTime(string $val): static
    {
        $this->last_edited_time = new \DateTime($val);
        return $this;
    }
}