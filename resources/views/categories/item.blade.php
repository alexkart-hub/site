<div class="col-lg-4 col-xl-3 col-md-6">
    <div class="single_catagory">
        <a href="{{ route('category', $category->code) }}"><h2>{{ $category->name }}</h2></a>
        <p>Кол-во записей <span>{{ $category->posts()->count() }}</span></p>
    </div>
</div>
