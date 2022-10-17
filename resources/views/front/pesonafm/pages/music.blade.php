@extends('front.pesonafm.layouts.app')
@section('content')
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Years
            </th>
            <th scope="col" class="py-3 px-6">
                Song
            </th>
            <th scope="col" class="py-3 px-6">
                Artist
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Apple MacBook Pro 17"
            </th>
            <td class="py-4 px-6">
                Sliver
            </td>
            <td class="py-4 px-6">
                Laptop
            </td>
           
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Microsoft Surface Pro
            </th>
            <td class="py-4 px-6">
                White
            </td>
            <td class="py-4 px-6">
                Laptop PC
            </td>
           
        </tr>
        <tr class="bg-white dark:bg-gray-800">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Magic Mouse 2
            </th>
            <td class="py-4 px-6">
                Black
            </td>
            <td class="py-4 px-6">
                Accessories
            </td>
            
        </tr>
    </tbody>
</table>
@endsection