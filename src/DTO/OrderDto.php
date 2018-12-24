<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:29
 */

namespace App\DTO;


class OrderDto
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    protected $gender;
    protected $service;
    protected $birthday;
    protected $fullName;
    protected $phone;

    public static function genderList()
    {
        return [
            static::GENDER_MALE,
            static::GENDER_FEMALE,
        ];
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        if (!is_null($phone)) {
            $phone = preg_replace('/D+/', '', $phone);
        }
        $this->phone = $phone;
    }


}