<h1>CSS Image Hover Effects</h1>
<p>← <a href="https://www.nxworld.net/tips/css-image-hover-effects.html" target="_blank">View the article</a></p>

<h2>No Effect</h2>
<div class="column">
    <div>
        <figure><img src="https://picsum.photos/300/200?image=244" /></figure>
        <span>Hover</span>
    </div>
    <div>
        <figure><img src="https://picsum.photos/300/200?image=1024" /></figure>
        <span>Hover</span>
    </div>
    <div>
        <figure><img src="https://picsum.photos/300/200?image=611" /></figure>
        <span>Hover</span>
    </div>
</div>


<h2 id="demo14">14. Shine</h2>
<div class="hover14 row">
    <div>
        <figure><img src="https://picsum.photos/300/200?image=244" /></figure>
        <span>Hover</span>
    </div>
    <div>
        <figure><img src="https://picsum.photos/300/200?image=1024" /></figure>
        <span>Hover</span>
    </div>
    <div>
        <figure><img src="https://picsum.photos/300/200?image=611" /></figure>
        <span>Hover</span>
    </div>
</div>


<style>
/* Shine */
.hover14 figure {
    position: relative;
}

.hover14 figure::before {
    position: absolute;
    top: 0;
    left: -75%;
    z-index: 2;
    display: block;
    content: '';
    width: 50%;
    height: 100%;
    background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
    background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
    -webkit-transform: skewX(-25deg);
    transform: skewX(-25deg);
}

.hover14 figure:hover::before {
    -webkit-animation: shine .75s;
    animation: shine .75s;
}

@-webkit-keyframes shine {
    100% {
        left: 125%;
    }
}

@keyframes shine {
    100% {
        left: 125%;
    }
}
</style>