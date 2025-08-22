@extends('errors.layout')

@section('title', '500 - Kesalahan Server')
@section('code', '500')
@section('message', 'Terjadi kesalahan pada server. Silakan coba beberapa saat lagi.')
@section('action')
  <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
@endsection
