jQuery(function() {
    function hideSovetnik(){

        var allDivs = document.getElementsByTagName("div");
        var count = 0;
        var found = false;
        for(i = 0;i < allDivs.length; i++)
        {
            if (window.getComputedStyle(allDivs[i]).getPropertyValue("background-color") == "rgb(250, 223, 118)") {
                var node = allDivs[i];
                var html = document.getElementsByTagName("html");
                while(node.parentNode.nodeName.toLowerCase() != "body" && count < 20){
                    node = node.parentNode;
                    count++;
                }
                node.setAttribute("style","display:none !important;");
                html[0].setAttribute("style","margin-top: 0");
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        document.body.addEventListener('DOMSubtreeModified', function () {
            hideSovetnik();
        }, false);
        hideSovetnik();
    });
});