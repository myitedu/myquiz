


<script type="text/javascript" src="/js/tilt.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".categories"),{
        max: 25,
        speed: 400,
        glare:true,
        "max-glare": 1,
    });
</script>
<style>

    .bubles{
        position: absolute;
        display: flex;
    }
    .bubles span{
        position: relative;
        width: 30px;
        height: 30px;
        margin: 0 4px;
        border-radius: 50%;

        animation: animate 15s linear infinite;
        animation-duration:calc(50s / var(--i)) ;
    }

    @keyframes animate {
        100% {
            transform: translateY(100vh) scale(1);
        }
        0% {
            transform: translateY(-10vh) scale(0);
        }
    }
</style>

<!-- a href="#" style="--clr:#1e9bff"><span>Button</span><i></i></a -->
