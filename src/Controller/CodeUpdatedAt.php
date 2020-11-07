<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Code;
use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CodeUpdatedAt extends AbstractController
{
    public function __invoke(Code $data): Code
    {
        $data->setUpdatedAt(new DateTime('now', new DateTimeZone("Europe/Paris")));
        return $data;
    }
}
