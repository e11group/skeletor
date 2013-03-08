<?php
namespace Weather\Skeletor\Models\Items;

/** @Entity **/
class Items
{
 

    public function __construct(User $user)
    {
        $this->author = $user;
    }

}