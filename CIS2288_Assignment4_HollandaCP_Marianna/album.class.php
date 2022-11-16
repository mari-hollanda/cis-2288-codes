<?php
/*
 * Album Class
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-27
 * Class: CIS2288
 * Description: Assignment 4 - The Vinyl Creator
 */

class album
{
private $title;
private $artist;
private $publisher;
private $genre;
private $data = array();

    function __construct(){
        echo "Album created";
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }
    }

    public function __set($name, $value)
    {
        if(property_exists($this,$name)) {

            $this->$name = $value;

        }else{
            //An associative array is created when a property that has not been declared is set
            $this->data[$name] = $value;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    function __toString(){
        return "<p>Album Title: " . $this->title . "<br>" .
            "Artist: " . $this->artist . "<br>" .
            "Publisher: " . $this->publisher . "<br>" .
            "Genre: " . $this->genre . "<br>"
            . $this->display();
    }

    function display(){
        $string = "";
        if(count($this->data) > 0){
        foreach ($this->data as $key => $value){
            $string .= $key .": " . $value . "<br>";
        }
        }else{
            echo "";
        }
        return $string;
    }

















    }