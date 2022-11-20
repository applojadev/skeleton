<style>        
    .dynamic-primary-color{
        background-color: {{$colors->getValue('primary_color')}} !important;
    }
    .dynamic-secondary-color{
        background-color: {{$colors->getValue('secondary_color')}} !important;
    }
    .dynamic-primary-color-text{
        color: {{$colors->getValue('primary_color')}} !important;
    }
    .dynamic-secondary-color-text{
        color: {{$colors->getValue('secondary_color')}} !important;
    }   
    .loader {
        border-top-color: {{$colors->getValue('load_color')}} !important;
    }
    @media screen and (max-width: 300px) { 
        
    }        
</style>