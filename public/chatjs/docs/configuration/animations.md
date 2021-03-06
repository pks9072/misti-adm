# Animations

Chart.js animates charts out of the box. A number of options are provided to configure how the animation looks and how long it takes.

## Animation Configuration

The following animation options are available. The global options for are defined in `Chart.defaults.global.animation`.

| Name | Type | Default | Description
| ---- | ---- | ------- | -----------
| `duration` | `number` | `1000` | The number of milliseconds an animation takes.
| `easing` | `string` | `'easeOutQuart'` | Easing function to use. [more...](#easing)
| `onProgress` | `function` | `null` | Callback called on each step of an animation. [more...](#animation-callbacks)
| `onComplete` | `function` | `null` | Callback called at the end of an animation. [more...](#animation-callbacks)

## Easing

Available options are:
* `'linear'`
* `'easeInQuad'`
* `'easeOutQuad'`
* `'easeInOutQuad'`
* `'easeInCubic'`
* `'easeOutCubic'`
* `'easeInOutCubic'`
* `'easeInQuart'`
* `'easeOutQuart'`
* `'easeInOutQuart'`
* `'easeInQuint'`
* `'easeOutQuint'`
* `'easeInOutQuint'`
* `'easeInSine'`
* `'easeOutSine'`
* `'easeInOutSine'`
* `'easeInExpo'`
* `'easeOutExpo'`
* `'easeInOutExpo'`
* `'easeInCirc'`
* `'easeOutCirc'`
* `'easeInOutCirc'`
* `'easeInElastic'`
* `'easeOutElastic'`
* `'easeInOutElastic'`
* `'easeInBack'`
* `'easeOutBack'`
* `'easeInOutBack'`
* `'easeInBounce'`
* `'easeOutBounce'`
* `'easeInOutBounce'`

See [Robert Penner's easing equations](http://robertpenner.com/easing/).

## Animation Callbacks

The `onProgress` and `onComplete` callbacks are useful for synchronizing an external draw to the chart animation. The callback is passed a `Chart.Animation` instance:

```javascript
{
    // Chart object
    chart: Chart,

    // Current Animation frame number
    currentStep: number,

    // Number of animation frames
    numSteps: number,

    // Animation easing to use
    easing: string,

    // Function that renders the chart
    render: function,

    // Admin callback
    onAnimationProgress: function,

    // Admin callback
    onAnimationComplete: function
}
```

The following example fills a progress bar during the chart animation.
```javascript
var chart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        animation: {
            onProgress: function(animation) {
                progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
            }
        }
    }
});
```

Another example usage of these callbacks can be found on [Github](https://github.com/chartjs/Chart.js/blob/master/samples/advanced/progress-bar.html): this sample displays a progress bar showing how far along the animation is.
