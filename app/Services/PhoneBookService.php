<?php


namespace app\Services;


use app\Core\Application;
use app\Entity\PhoneBook;
use app\Repositories\RepositoryFactory;
use function DI\value;

class PhoneBookService
{
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository|mixed
     */
    private $phoneBookRepository;
    /**
     * @var Application
     */
    private Application $app;
    /**
     * @var HttpRequestService
     */
    private HttpRequestService $request;

    public function __construct()
    {

        $this->phoneBookRepository = RepositoryFactory::createRepository(PhoneBook::class);
        $this->request = new HttpRequestService();
        $this->app = Application::createInstance();

    }

    public function all()
    {
        return $this->phoneBookRepository->findAll();

    }

    public function getById(int $id)
    {

        return $this->phoneBookRepository->find($id);

    }

    public function create(array $data)
    {

        try {
            $phoneBook = new PhoneBook();
            $phoneBook->create($data);
            $this->app->getConnection()->persist($phoneBook);
            $this->app->getConnection()->flush($phoneBook);
            return $phoneBook->getId();

        } catch (\Exception $e) {
            return false;
        }

    }

    public function update(array $data)
    {
        $phoneBook = $this->phoneBookRepository->find($data['id']);

        if (isset($phoneBook)) {
            $phoneBook->update($data);
            $this->app->getConnection()->flush($phoneBook);
            return true;
        }
        return false;

    }

    public function checkIfColumnExistsInDb($key, $value)
    {
        try {
            return $this->phoneBookRepository->findOneBy([$key => $value]);

        } catch (\Exception $e) {
            return false;

        }

    }

    public function delete(array $data)
    {
        try {
            $phoneBook = $this->phoneBookRepository->find($data['id']);
            if (isset($phoneBook)) {
                $this->app->getConnection()->remove($phoneBook);
                $this->app->getConnection()->flush($phoneBook);
                return true;
            }
            return false;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}