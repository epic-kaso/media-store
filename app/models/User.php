<?php

    use Laravel\Cashier\BillableInterface;
    use Laravel\Cashier\BillableTrait;
    use Zizaco\Confide\ConfideUser;
    use Zizaco\Confide\ConfideUserInterface;
    use Zizaco\Entrust\HasRole;

    class User extends Eloquent implements ConfideUserInterface, BillableInterface {
        use ConfideUser,HasRole,BillableTrait;

        protected $dates = ['trial_ends_at', 'subscription_ends_at'];
    }
