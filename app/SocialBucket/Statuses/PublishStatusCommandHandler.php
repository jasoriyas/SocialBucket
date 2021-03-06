<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 14-04-2015
 * Time: 02:09
 */

namespace SocialBucket\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
class PublishStatusCommandHandler implements CommandHandler{

    use DispatchableTrait;

    /**
     * @var StatusRepository
     */
    protected $statusRepository;

    function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }


    /*
     * Handle the command
     * @return mixed
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $this->statusRepository->save($status, $command->userId);

        $this->dispatchEventsFor($status);

        return $status;
    }

}