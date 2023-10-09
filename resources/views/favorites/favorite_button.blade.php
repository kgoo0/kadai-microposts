<!--すでにお気に入りしている場合-->
    @if (Auth::user()->is_favoriting($micropost->id))
        {{-- お気に入り削除ボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.unfavorite', $micropost->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-block normal-case" 
                onclick="return confirm('id = {{ $micropost->id }} のお気に入りを削除します。よろしいですか？')">Unfavorite</button>
        </form>
    <!--お気に入りしていない場合-->
    @else
        {{-- お気に入りボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.favorite', $micropost->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-block normal-case">Favorite</button>
        </form>
    @endif
