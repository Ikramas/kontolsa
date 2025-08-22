@extends('errors.layout')

@section('title', '403 - Dilarang')
@section('code', '403')
@section('message', 'Anda tidak memiliki izin untuk mengakses halaman ini.')
@section('action')
  @auth
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Ke Beranda</a>
  @else
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
  @endauth
@endsection
