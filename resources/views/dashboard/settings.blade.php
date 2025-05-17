@extends('defaultDashboardView')
@section('title', 'Ayarlar')
@section('breadcrumb', 'Dashboard › Ayarlar')

@section('content')
<div class="w-full flex justify-center py-8">
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-4xl space-y-8">
        <div class="flex items-center space-x-6">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4F46E5&color=fff&size=96"
                alt="Profil Fotoğrafı"
                class="w-20 h-20 rounded-full border-4 border-indigo-100 shadow">
            <div class="flex-1">
                <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('settings.post') }}" method="POST" class="space-y-8">
            @csrf
            <div class="bg-gray-50 shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Kişisel Bilgiler</h3>
                    <span class="text-xs text-gray-400">Düzenlenebilir</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">İsim</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">E-Mail</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefon</label>
                        <input type="text" name="phone" value="{{ old('phone', optional(Auth::user()->userInformation)->phone) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Açıklama (Biyografi)</label>
                        <input type="text" name="bio" value="{{ old('bio', Auth::user()->bio ?? '') }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Adres Bilgileri</h3>
                    <span class="text-xs text-gray-400">Düzenlenebilir</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ülke</label>
                        <input type="text" name="country" value="{{ old('country', optional(Auth::user()->userInformation)->country) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Şehir/İl</label>
                        <input type="text" name="city" value="{{ old('city', optional(Auth::user()->userInformation)->city) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">İlçe</label>
                        <input type="text" name="state" value="{{ old('state', optional(Auth::user()->userInformation)->state) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Adres</label>
                        <input type="text" name="address" value="{{ old('address', optional(Auth::user()->userInformation)->address) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Posta Kodu</label>
                        <input type="text" name="zip_code" value="{{ old('zip_code', optional(Auth::user()->userInformation)->zip_code) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                    Değişiklikleri Kaydet
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        @if (session('success'))
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Tamam"
            })
        @endif
    </script>
@endsection