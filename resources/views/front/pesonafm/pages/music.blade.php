@extends('front.pesonafm.layouts.app')
@section('content')
@if($music->count() != 0)
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
<meta charset="UTF-8" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<script src="https://cdn.tailwindcss.com"></script>
<title> belajar tailwindCSS</title>
<style type="text/tailwindcss">
  
  </style>
  </head> 
  <table class="table-auto">
  <thead>
    <tr>
      <th>Song</th>
      <th>Artist</th>
      <th>Year</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
      <td>Malcolm Lockyer</td>
      <td>1961</td>
    </tr>
    <tr>
      <td>Witchy Woman</td>
      <td>The Eagles</td>
      <td>1972</td>
    </tr>
    <tr>
      <td>Shining Star</td>
      <td>Earth, Wind, and Fire</td>
      <td>1975</td>
    </tr>
  </tbody>
</table>