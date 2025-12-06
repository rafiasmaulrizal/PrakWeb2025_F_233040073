<x-layout>

    <x-slot:title>
        Posts
    </x-slot:title>

    <h1>Halaman Posts</h1>
    <p>Selamat datang di halaman posts.</p>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse;">
        <thead style="background:#f2f2f2;">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
