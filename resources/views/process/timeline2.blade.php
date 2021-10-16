$bg: #4D4545

$color: #ED8D8D

$font-stack: 'Lato', sans-serif

html,
body
    font: 100% $font-stack
    font-weight: 300
    height: 100%
    background-color: $bg

.blue-bg
    background-color: $bg
    color: $color
    height: 100%
    
.circle
    font-weight: bold
    padding: 15px 20px
    border-radius: 50%
    background-color: $color
    color: $bg
    max-height: 50px
    z-index: 2

.how-it-works.row
    display: flex
    .col-2
        display: inline-flex
        align-self: stretch
        align-items: center
        justify-content: center
        &::after
            content: ''
            position: absolute
            border-left: 3px solid $color
            z-index: 1
    .col-2.bottom
        &::after
            height: 50%
            left: 50%
            top: 50%
    .col-2.full
        &::after
            height: 100%
            left: calc(50% - 3px)
    .col-2.top
        &::after
            height: 50%
            left: 50%
            top: 0



.timeline

    div
        padding: 0
        height: 40px
    hr
        border-top: 3px solid $color
        margin: 0
        top: 17px
        position: relative
    .col-2
        display: flex
        overflow: hidden
    .corner
        border: 3px solid $color
        width: 100%
        position: relative
        border-radius: 15px
    .top-right
        left: 50%
        top: -50%
    .left-bottom
        left: -50%
        top: calc(50% - 3px)
    .top-left
        left: -50%
        top: -50%
    .right-bottom
        left: 50%
        top: calc(50% - 3px)




.container-fluid.blue-bg
    .container
        h2.pb-3.pt-2 Vertical Left-Right Timeline
        
        //first section
        .row.align-items-center.how-it-works
            .col-2.text-center.bottom
                .circle 1
            .col-6
                h5 Fully Responsive
                p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.
        
        
        //path between 1-2
        .row.timeline
            .col-2
                .corner.top-right
            .col-8
                hr
            .col-2
                .corner.left-bottom
        
        //second section
        .row.align-items-center.justify-content-end.how-it-works
            .col-6.text-right
                h5 Using Bootstrap
                p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.
            .col-2.text-center.full
                .circle 2
        
        //path between 2-3
        .row.timeline
            .col-2
                .corner.right-bottom
            .col-8
                hr
            .col-2
                .corner.top-left
        
        //third section
        .row.align-items-center.how-it-works
            .col-2.text-center.top
                .circle 3
            .col-6
                h5 Now with Pug and Sass
                p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor gravida aliquam. Morbi orci urna, iaculis in ligula et, posuere interdum lectus.