<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2017/12/22
 * Time: 下午12:58
 */

namespace App\Repositories;
use App\Models\Merchant;

class MerchantRepository
{
    protected $model;

    public function __construct(Merchant $merchant)
    {
        $this->model = $merchant;
    }

}