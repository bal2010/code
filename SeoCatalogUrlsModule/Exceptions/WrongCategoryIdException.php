<?php

namespace Modules\SeoCatalogUrlsModule\Exceptions;

use Exception;

class WrongCategoryIdException extends Exception
{
    protected $message = 'Неверный id категории';
}
