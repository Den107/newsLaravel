<h1>List News</h1>
<br>
 @forelse ($news as $n)
    <div>
        <div> {{$n['id']}} </div>
        <div><a href=" {{route('news.show', [
                            'id' => $n['id']
                        ])}}"> {{$n['title'] }}</a></div>
        <div> {{$n['description']}} </div>
    </div>
    @empty
    <h1>Новостей нет!!!</h1>
 @endforelse
