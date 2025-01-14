<?php
$title = 'Profile';
?>

<script src="{{ asset('js/profile-script.js') }}"></script>

<x-layout :title="$title">
    <h1 class="lilita-one-font mt-4 mb-4">{{ $title }}</h1>
    <div>
        <form method="POST" action="{{ url('profile') }}">
            <section class="lilita-one-font" id="dataForm">
                @csrf
                <p class="mb-3 color-navy">{{ $errors->first('name') }}</p>
                <label class="color-blue">Display name: </label>
                <label>{{ auth()->user()->name }}</label>
                <br>
                <p class="mb-3 color-navy"">{{ $errors->first('email') }}</p>
                <label class="color-blue">E-mail: </label>
                <label>{{ auth()->user()->email }} </label>
                <br>
                <p class="mb-3 color-navy"">{{ $errors->first('phone') }}</p>
                <label class="color-blue">Phone number: </label>
                <label>{{ auth()->user()->phone }} </label>
                <div class="mt-4">
                    <a class="btn view-button btn-lg" id="viewPost" href="{{ url('post-management') }}">View my
                        posts</a>
                    <button class="btn view-button btn-lg" type="button" id="editBtn">Edit</button>
                </div>
            </section>
            <section class="lilita-one-font edit-section-profile" id="editForm">

                <label class="mb-3 color-blue">Display name: </label>
                <input type="text" name="name" value={{ auth()->user()->name }}>
                <br>
                <label class="mb-3 color-blue">E-mail: </label>
                <input type="text" name="email" value={{ auth()->user()->email }}>
                <br>
                <label class="mb-3 color-blue">Phone number: </label>
                <input type="text" name="phone" value={{ auth()->user()->phone }}>
                <div class="mt-4">
                    <a class="btn view-button btn-lg" href="{{ url('post-management') }}">View my posts</a>
                    <input class="btn view-button btn-lg ml-2" type="submit" value="save">
                </div>
            </section>
        </form>
    </div>
    <h2 class="mt-5 lilita-one-font">Your liked pets!</h2>
    @if (count($reactions) == 0)
        <p class="playpen-bold-font">You have not made any reactions yet. Once you do you can find them all here!</p>
    @else
        <x-reaction-card-collumn>
            <x-reaction-card :reactions="$reactions" :types_of_pets="$types_of_pets"/>
        </x-reaction-card-collumn>
    @endif
</x-layout>
