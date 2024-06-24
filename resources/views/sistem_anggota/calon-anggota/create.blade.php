@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-8 p-20">
        <div class="relative">
            <!-- Div dengan background transparan di bawahnya -->
            <div class="relative bg-transparent border h-24 border-gray-900 dark:border-white p-6 rounded-lg shadow-lg z-10">
                <h1 class="text-center text-3xl mt-1 font-bold text-gray-900 dark:text-white">Formulir Pendaftaran Anggota PASKAS/GIB SOLO</h1>
            </div>
             <!-- Div dengan background kuning pastel -->
             <div class="absolute h-24 top-2 left-2 right-0 bg-yellow-200 p-6 rounded-lg shadow-lg">
            </div>
        </div>
        

            <!-- Form Tambah Calon Anggota -->
            <form action="{{ route('calon-anggota.store') }}" method="POST" class="border border-gray-900 dark:border-white p-12 mt-10 bg-white dark:bg-gray-900 rounded-lg shadow-lg">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-gray-800 font-bold">Email</label>

                    <div class="relative">
                        <!-- Kolom input dengan latar belakang transparan -->
                        <input type="email" name="email"
                            class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                            required>
                    
                        <!-- Elemen retro di sekitar kolom input -->
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                    </div> 

                </div>

                <div class="mb-4">
                    <label for="nama_lengkap" class="text-gray-800 font-bold">Nama Lengkap</label>
                    <div class="relative">
                            <!-- Kolom input dengan latar belakang transparan -->
                            <input type="text" name="nama_lengkap"
                                class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                                required>
                        
                            <!-- Elemen retro di sekitar kolom input -->
                            <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                        </div> 
                </div>

                <div class="mb-4">
                    <label for="gender" class="text-gray-800 font-bold">Jenis Kelamin</label>
                    <div class="relative">
                    <select name="gender"
                        class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                        required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="tempat_lahir" class="text-gray-800 font-bold">Kota Tempat Lahir</label>
                    <div class="relative">
                    <input type="text" name="tempat_lahir"
                        class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                        required>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="tanggal_lahir" class="text-gray-800 font-bold">Tanggal Lahir</label>
                    <div class="relative">
                    <input type="date" name="tanggal_lahir"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                    required>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                    
                    </div>
                </div>

                <div class="mb-4">
                    <label for="alamat_lengkap" class="text-gray-800 font-bold">Alamat Lengkap</label>
                    <div class="relative">
                    <input name="alamat_lengkap"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full h-10 py-2 px-3 mt-1 text-base text-gray-800"
                    required></input>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="status" class="text-gray-800 font-bold">Status</label>
                    <div class="relative">
                    <select name="status"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                    required>
                        
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Single">Single (pernah menikah)</option>
                    </select>
                    <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="pekerjaan" class="text-gray-800 font-bold">Pekerjaan</label>
                    <div class="relative">
                    <input type="text" name="pekerjaan"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                    required>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="no_hp" class="text-gray-800 font-bold">No.Telp / WA</label>
                    <div class="relative">
                    <input type="text" name="no_hp"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                    required>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="pilihan_kontribusi" class="text-gray-800 font-bold">Pilihan Kontribusi</label>
                    <div class="relative">
                    <select name="pilihan_kontribusi"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full py-2 px-3 mt-1 text-base text-gray-800"
                    required>
                        <option value="">Silahkan Dipilih</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Media Konten Publikasi">Media Konten Publikasi</option>
                        <option value="Finance">Finance</option>
                        <option value="Fundraising">Fundraising</option>
                        <option value="Sumber Daya Manusia">Sumber Daya Manusia</option>
                        <option value="Tim Support Program">Tim Support Program</option>
                        <option value="Distribusi Infaq Beras">Distribusi Infaq Beras</option>
                    </select>
                    <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="organisasi_diikuti" class="text-gray-800 font-bold">Komunitas / Organisasi yang Diikuti</label>
                    <div class="relative">
                    <input name="organisasi_diikuti"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full h-10 py-2 px-3 mt-1 text-base text-gray-800"
                    required></input>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <label for="tentang_paskas" class="text-gray-800 font-bold">Apa yang Diketahui tentang PASKAS/GIB</label>
                    <div class="relative">
                    <input name="tentang_paskas"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full h-10 py-2 px-3 mt-1 text-base text-gray-800"
                    required></input>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="mb-4 mt-4">
                    <input type="checkbox" name="pilar_paskas" id="pilar_paskas" class="mr-2" value="true">
                    <label for="pilar_paskas" class="text-gray-800 font-bold">Konfirmasi kemauan untuk melaksanakan pilar dakwah
                        PASKAS (Birrul Walidain, Membaca Al Qur'an 1 hari 1 halaman, Sholat Tepat Awal Waktu dan
                        INSPIRING—infaq sering-sering)</label>
                       
                </div>


                <div class="mb-4 mt-4">
                    <label for="doa_harapan" class="text-gray-800 font-bold">Do’a dan Harapan terhadap PASKAS</label>
                    <div class="relative">
                    <input name="doa_harapan"
                    class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full h-10 py-2 px-3 mt-1 text-base text-gray-800"
                    required></input>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-yellow-200 rounded-lg shadow-lg z-0"></div>
                </div>

                <div class="flex mt-10">
                    <div class="relative">
                    <button type="submit"
                        class="relative bg-transparent border border-gray-900 dark:border-white p-6 rounded-lg z-10 block w-full h-10 py-2 px-3 mt-1 text-base text-gray-800">Simpan</button>
                        <div class="absolute h-10 top-2 left-2 right-0 bg-blue-200 rounded-lg shadow-lg z-0"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
