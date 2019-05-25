<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Wheel of Fortune Bingo</title>
    
<!--
    
MIT License
Copyright (c) 2017 Jeremy Rue
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.




 {"label":"Question 4",  "value":1,  "question":"What CSS property is used for changing the boldness of text?"}, //font-weight
                    {"label":"Question 5",  "value":1,  "question":"What CSS property is used for changing the size of text?"}, //font-size
                    {"label":"Question 6",  "value":1,  "question":"What CSS property is used for changing the background color of a box?"}, //background-color
                    {"label":"Question 7",  "value":1,  "question":"Which word is used for specifying an HTML tag that is inside another tag?"}, //nesting
                    {"label":"Question 8",  "value":1,  "question":"Which side of the box is the third number in: margin:1px 1px 1px 1px; ?"}, //bottom
                    {"label":"Question 9",  "value":1,  "question":"What are the fonts that don't have serifs at the ends of letters called?"}, //sans-serif
                    {"label":"Question 10", "value":1, "question":"With CSS selectors, what character prefix should one use to specify a class?"}, //period
                    {"label":"Question 11", "value":1, "question":"With CSS selectors, what character prefix should one use to specify an ID?"}, //pound sign
                    {"label":"Question 12", "value":1, "question":"In an HTML document, which tag holds all of the content people see?"}, //<body>
                    {"label":"Question 13", "value":1, "question":"In an HTML document, which tag indicates an unordered list?"}, //<ul>
                    {"label":"Question 14", "value":1, "question":"In an HTML document, which tag indicates the most important heading of your document?"}, //<h1>
                    {"label":"Question 15", "value":1, "question":"What CSS property is used for specifying the area outside a box?"}, //margin
                    {"label":"Question 16", "value":1, "question":"What type of bracket is used for HTML tags?"}, //< >
                    {"label":"Question 17", "value":1, "question":"What type of bracket is used for CSS rules?"}, // { }
                    {"label":"Question 18", "value":1, "question":"Which HTML tag is used for specifying a paragraph?"}, //<p>
                    {"label":"Question 19", "value":1, "question":"What should always be the very first line of code in your HTML?"}, //<!DOCTYPE html>
                    {"label":"Question 20", "value":1, "question":"What HTML tag holds all of the metadata tags for your page?"}, //<head>
                    {"label":"Question 21", "value":1, "question":"In CSS, what character separates a property from a value?"}, // colon
                    {"label":"Question 22", "value":1, "question":"What HTML tag holds all of your CSS code?"}, // <style>
                    {"label":"Question 23", "value":1, "question":"What file extension should you use for your web pages?"}, // .html
                    {"label":"Question 24", "value":1, "question":"Which coding language is used for marking up content and structure on a web page?"}, // HTML
                    {"label":"Question 25", "value":1, "question":"Which coding language is used for specifying the design of a web page?"}, // CSS
                    {"label":"Question 26", "value":1, "question":"Which coding language is used for adding functionality to a web page?"}, // JavaScript
                    {"label":"Question 27", "value":1, "question":"What CSS property is used for making the edges of a box visible?"}, // border
                    {"label":"Question 28", "value":1, "question":"What character symbol is used at the end of each CSS statement?"},//semi-colon
                    {"label":"Question 29", "value":1, "question":"By default, how wide is a <div> box?"}, //100%
                    {"label":"Question 30", "value":0, "question":"What character symbol do I use to specify multiple CSS selectors in one code block?"} //comma
-->
    
    <style type="text/css">
    text{
        font-family:Helvetica, Arial, sans-serif;
        font-size:11px;
        pointer-events:none;
    }
    #chart{
        position:absolute;
        width:500px;
        height:500px;
        top:0;
        left:0;
    }
    #question{
        position: absolute;
        width:400px;
        height:500px;
        top:0;
        left:520px;
    }
    #question h1{
        font-size: 50px;
        font-weight: bold;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        position: absolute;
        padding: 0;
        margin: 0;
        top:50%;
        -webkit-transform:translate(0,-50%);
                transform:translate(0,-50%);
    }
    </style>
    
</head>
<body>
    <div id="chart"></div>
    <div id="question"><h1></h1></div>
    
    <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        var padding = {top:20, right:40, bottom:0, left:0},
            w = 500 - padding.left - padding.right,
            h = 500 - padding.top  - padding.bottom,
            r = Math.min(w, h)/2,
            rotation = 0,
            oldrotation = 0,
            picked = 100000,
            oldpick = [],
            color = d3.scale.category20();//category20c()
            //randomNumbers = getRandomNumbers();
        //http://osric.com/bingo-card-generator/?title=HTML+and+CSS+BINGO!&words=padding%2Cfont-family%2Ccolor%2Cfont-weight%2Cfont-size%2Cbackground-color%2Cnesting%2Cbottom%2Csans-serif%2Cperiod%2Cpound+sign%2C%EF%B9%A4body%EF%B9%A5%2C%EF%B9%A4ul%EF%B9%A5%2C%EF%B9%A4h1%EF%B9%A5%2Cmargin%2C%3C++%3E%2C{+}%2C%EF%B9%A4p%EF%B9%A5%2C%EF%B9%A4!DOCTYPE+html%EF%B9%A5%2C%EF%B9%A4head%EF%B9%A5%2Ccolon%2C%EF%B9%A4style%EF%B9%A5%2C.html%2CHTML%2CCSS%2CJavaScript%2Cborder&freespace=true&freespaceValue=Web+Design+Master&freespaceRandom=false&width=5&height=5&number=35#results
        var data = [
                    {"label":"Question 1",  "value":1,  "question":"Patric"}, // padding
                    {"label":"Question 2",  "value":1,  "question":"Steven"}, //font-family
                    {"label":"Question 3",  "value":1,  "question":"John"}, //color
                   
        ];
        var svg = d3.select('#chart')
            .append("svg")
            .data([data])
            .attr("width",  w + padding.left + padding.right)
            .attr("height", h + padding.top + padding.bottom);
        var container = svg.append("g")
            .attr("class", "chartholder")
            .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");
        var vis = container
            .append("g");
            
        var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
        // declare an arc generator function
        var arc = d3.svg.arc().outerRadius(r);
        // select paths, use arc generator to draw
        var arcs = vis.selectAll("g.slice")
            .data(pie)
            .enter()
            .append("g")
            .attr("class", "slice");
            
        arcs.append("path")
            .attr("fill", function(d, i){ return color(i); })
            .attr("d", function (d) { return arc(d); });
        // add the text
        arcs.append("text").attr("transform", function(d){
                d.innerRadius = 0;
                d.outerRadius = r;
                d.angle = (d.startAngle + d.endAngle)/2;
                return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
            })
            .attr("text-anchor", "end")
            .text( function(d, i) {
                return data[i].label;
            });
        container.on("click", spin);
        function spin(d){
            
            container.on("click", null);
            //all slices have been seen, all done
            console.log("OldPick: " + oldpick.length, "Data length: " + data.length);
            if(oldpick.length == data.length){
                console.log("done");
                container.on("click", null);
                return;
            }
            var  ps       = 360/data.length,
                 pieslice = Math.round(1440/data.length),
                 rng      = Math.floor((Math.random() * 1440) + 360);
                
            rotation = (Math.round(rng / ps) * ps);
            
            picked = Math.round(data.length - (rotation % 360)/ps);
            picked = picked >= data.length ? (picked % data.length) : picked;
            if(oldpick.indexOf(picked) !== -1){
                d3.select(this).call(spin);
                return;
            } else {
                oldpick.push(picked);
            }
            rotation += 90 - Math.round(ps/2);
            vis.transition()
                .duration(3000)
                .attrTween("transform", rotTween)
                .each("end", function(){
                    //mark question as seen
                    d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                        .attr("fill", "#111");
                    //populate question
                    d3.select("#question h1")
                        .text(data[picked].question);
                    oldrotation = rotation;
                
                    container.on("click", spin);
                });
        }
        //make arrow
        svg.append("g")
            .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
            .append("path")
            .attr("d", "M-" + (r*.15) + ",0L0," + (r*.05) + "L0,-" + (r*.05) + "Z")
            .style({"fill":"black"});
        //draw spin circle
        container.append("circle")
            .attr("cx", 0)
            .attr("cy", 0)
            .attr("r", 60)
            .style({"fill":"white","cursor":"pointer"});
        //spin text
        container.append("text")
            .attr("x", 0)
            .attr("y", 15)
            .attr("text-anchor", "middle")
            .text("SPIN")
            .style({"font-weight":"bold", "font-size":"30px"});
        
        
        function rotTween(to) {
          var i = d3.interpolate(oldrotation % 360, rotation);
          return function(t) {
            return "rotate(" + i(t) + ")";
          };
        }
        
        
        function getRandomNumbers(){
            var array = new Uint16Array(1000);
            var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
            if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
                window.crypto.getRandomValues(array);
                console.log("works");
            } else {
                //no support for crypto, get crappy random numbers
                for(var i=0; i < 1000; i++){
                    array[i] = Math.floor(Math.random() * 100000) + 1;
                }
            }
            return array;
        }
    </script>
</body>
</html>