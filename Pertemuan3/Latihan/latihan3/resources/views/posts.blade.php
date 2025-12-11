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
                <th>Gambar</th>
                <th>Judul</th>
                <th>Isi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="width:160px;">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}" style="max-height:120px; width:auto; display:block; object-fit:cover;">
                        @else
                            <img src="{{ asset('images/preview.svg') }}" alt="Placeholder" style="max-height:120px; width:auto; display:block; object-fit:cover;">
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
