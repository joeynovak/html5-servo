ServoJs = function() {
    var ns = {};
    var sampleRate = 44100;
    var channels = 1;
    var min = .5;
    var max = 2.5;
    var refreshRate = 60;
    var amplitude = 255;
    var center = 127;
    var count = 20;
    ns.moveTo = moveTo;

    var audio = null;

    function moveTo(channel, positionPercentage){
        var riffwav = new RIFFWAVE();
        riffwav.header.sampleRate = sampleRate;
        riffwav.header.numChannels = 1;
        riffwav.header.bitsPerSample = 8;
        riffwav.Make(pulses(positionPercentage, count));

        var audio = new Audio(riffwav.dataURI);
        audio.play();
    }

    function pulses(position, count){
        var samples = [];
        var currentSample = 0;
        var currentTime = 0;
        var period = 1.0/refreshRate;
        var pulseWidth = position / 100.0 * (max - min) + min;
        var perSample = 1.0 / sampleRate;

        while(currentTime <= pulseWidth / 1000.0){
            samples[currentSample] = amplitude;
            currentSample++;
            currentTime+=perSample;
        }

        while(currentTime < period){
            samples[currentSample] = center;
            currentSample++;
            currentTime+=perSample;
        }

        var allSamples = [];
        for(i=0;i<=count;i++){
            allSamples = allSamples.concat(samples);
        }

        return allSamples;
    }

    return ns;
}();

