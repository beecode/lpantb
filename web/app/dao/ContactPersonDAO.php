<?php

namespace App\DAO;

use App\Models\ContactPerson;

/**
 * Description of ContactPersonDAO
 *
 * @author nunenuh
 */
class ContactPersonDAO {

    public static function saveOrUpdate($ct, $anak = null) {
        $contact = null;
        if (isset($ct['id'])) {
            $contact = ContactPersonDAO::update($ct, $anak);
        } else {
            $contact = ContactPersonDAO::save($ct, $anak);
        }
        return $contact;
    }

    public static function save($ct, $anak = null) {
        $contact = new ContactPerson();
        $contact = ContactPersonDAO::exchangeArray($contact, $ct);
        if (!is_null($anak)) {
            $contact->Anak()->associate($anak);
        }
        $contact->save();

        return $contact;
    }

    public static function update($ct, $anak = null) {
        $contact = ContactPerson::find($ct['id']);
        $contact = ContactPersonDAO::exchangeArray($contact, $ct);
        if (!is_null($anak)) {
            $contact->Anak()->associate($anak);
        }
        $contact->update();

        return $contact;
    }

    public static function exchangeArray($contact, $ct) {
        $contact->nama = $ct['nama'];
        $contact->telp = $ct['telp'];

        return $contact;
    }

    public static function delete($id) {
        $contact = ContactPerson::find($id);
        if (!is_null($contact->first())) {
            return $contact->delete();
        } else {
            return false;
        }
    }

}
