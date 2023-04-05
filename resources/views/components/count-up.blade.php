@props(['value', 'delay' => 3500])

<div x-data="{ current: 0, target: {{ $value }}, time: {{ $delay }}}" x-init="() => {
    start = current; 
    const interval = Math.max(time / (target - start), 5); 
    const step = (target - start) /  (time / interval);  
    const handle = setInterval(() => {
        if(current < target) 
            current += step
        else {
            clearInterval(handle);
            current = target
        }   
        }, interval)
}">
    <div class="card" x-text="Math.round(current).toLocaleString()"></div>
</div>