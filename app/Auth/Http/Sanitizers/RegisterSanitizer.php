<?php namespace ThreeAccents\Auth\Http\Sanitizers;

use ThreeAccents\Packages\Sanitizer\Sanitizer;
use ThreeAccents\Users\Repositories\UserRepository;

class RegisterSanitizer extends Sanitizer
{
    protected $rules = [
        'username' => 'strtolower|trim',
        'first_name' => 'strtolower|trim',
        'last_name' => 'strtolower|trim',
        'slug' => 'username',
    ];

    function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }
}