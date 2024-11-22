<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
    <a href="{{ $link }}" class="category">
        <div class="category__cover object-cover">
            <img style="height: 10rem;" class="object-cover obje object-center"  src={{ asset($image) }} alt={{ $title }}>
        </div>
        <h3 class="category__title">{{ $title }}</h3>
        <span class="category__value">{{ $value }}</span>
    </a>
</div>
