<div>
    <div class="lds-dual-ring"></div>
</div>
<style>
    .lds-dual-ring {
        display: inline-block;
        width: 25px;
        height: 25px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 30px;
        height: 30px;
        margin: 0px;
        border-radius: 50%;
        border: 3px solid rgb(9, 8, 8);
        border-color: rgb(0, 0, 0) transparent rgb(16, 15, 15) transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
