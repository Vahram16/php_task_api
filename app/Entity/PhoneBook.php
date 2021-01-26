<?php


namespace app\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="phone_books")
 */
class PhoneBook implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $firstName;
    /**
     * @ORM\Column(type="string")
     */
    protected $lastName;
    /**
     * @ORM\Column(type="string")
     */
    protected $phoneNumber;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $countryCode;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $timezone;

    /**
     * @var DateTime $created
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var DateTime $updated
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    protected $updatedAt;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLasttName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lasttName
     */
    public function setLasttName($lasttName): void
    {
        $this->lasttName = $lasttName;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     */
    public function setCountryCode($countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone): void
    {
        $this->timezone = $timezone;
    }

    public function create(array $data)
    {
        $this->firstName = $data['firstname'];
        $this->phoneNumber = ($data['phone_number']);
        $data['lastname'] ? $this->lastName = $data['lastname'] : null;
        $data['timezone'] ? $this->timezone = $data['timezone'] : null;
        $data['country_code'] ? $this->countryCode = ($data['country_code']) : null;
        $this->setCreatedAt(new DateTime('now'));
        $this->setUpdatedAt(new DateTime('now'));

    }

    public function update(array $data)
    {

        isset($data['phone_number']) ? $this->phoneNumber = $data['phone_number'] : null;
        isset($data['lastname']) ? $this->lastName = $data['lastname'] : null;
        isset($data['firstname']) ? $this->firstName = $data['firstname'] : null;
        isset($data['timezone']) ? $this->timezone = $data['timezone'] : null;
        isset($data['country_code']) ? $this->countryCode = $data['country_code'] : null;
        $this->setUpdatedAt(new DateTime('now'));

    }

    public function jsonSerialize()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'id' => $this->id,
            'timezone' => $this->timezone,
            'countryCode' => $this->countryCode,
            'poneNumber' => $this->phoneNumber,

        ];
    }

    public function updatedTimestamps(): void
    {
        $dateTimeNow = new DateTime('now');

        $this->setUpdatedAt($dateTimeNow);

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    protected function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    protected function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}