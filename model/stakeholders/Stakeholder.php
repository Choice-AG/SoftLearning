<?php

interface Stakeholder {
    public function getName(): string;
    public function getIdent():string;
    public function getContactData():string;
}