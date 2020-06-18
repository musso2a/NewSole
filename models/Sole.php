<?php

function getAllSoles()
{
$db = dbConnect();

$query = $db->query('SELECT * FROM soles');
$soles = $query->fetchAll();

return $soles;
}

function getSole($id)
{
$db = dbConnect();

$query = $db->prepare("SELECT * FROM soles WHERE id = ?");
$query->execute([
$id
]);

$result = $query->fetch();

return $result;
}