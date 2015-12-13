<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use
    Doctrine\ORM\Mapping as ORM,
    Symfony\Component\Validator\Constraints as Assert,
    AppBundle\Entity\Contact
    ;

class Contacts
{
    protected $contacts;

    function __construct(){
        $this->contacts = new ArrayCollection();
    }

    public function setContacts(ArrayCollection $contacts)
    {
        $this->contacts = $contacts;

    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact)
    {
        $this->contacts->add($contact);
    }

    public function removeContact(Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }
}