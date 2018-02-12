<?php

use Illuminate\Database\Seeder;

class EstablishmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = collect([
            ['name' => 'beer', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.57 62.14" height="20px">
    <path fill="#f05153"
          d="M40.07,0H2.5A2.5,2.5,0,0,0,0,2.78L6.47,59.92A2.5,2.5,0,0,0,9,62.14H33.61a2.5,2.5,0,0,0,2.48-2.22L42.55,2.78A2.5,2.5,0,0,0,40.07,0Zm-2.8,5-.65,5.75a7.82,7.82,0,0,0-2.15,1.12,2.31,2.31,0,0,1-3,0,7.26,7.26,0,0,0-8.67,0,2.3,2.3,0,0,1-3,0,7,7,0,0,0-4.33-1.44,7,7,0,0,0-4.33,1.44,2.14,2.14,0,0,1-1.51.56,2.14,2.14,0,0,1-1.51-.56,7.86,7.86,0,0,0-2.12-1.11L5.3,5ZM31.38,57.14H11.19L6.63,16.8a6.82,6.82,0,0,0,2.95.62A7,7,0,0,0,13.91,16a2.3,2.3,0,0,1,3,0,7.25,7.25,0,0,0,8.67,0,2.31,2.31,0,0,1,3,0A7,7,0,0,0,33,17.43a6.82,6.82,0,0,0,3-.64Z"/>
</svg>'],
            ['name' => 'craft beer', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.65 87.25" height="20px">
    <path fill="#f05135"
          d="M31.65,42.49a2.49,2.49,0,0,0-.07-.57V41.6A13.47,13.47,0,0,0,26.4,30.7a6.78,6.78,0,0,1-2.63-5.46V13.81a2.46,2.46,0,0,0-.67-1.69.71.71,0,0,1,0-1,2.46,2.46,0,0,0,.67-1.69V2.5A2.5,2.5,0,0,0,21.27,0h-11a2.5,2.5,0,0,0-2.5,2.5V9.45a2.46,2.46,0,0,0,.67,1.69.71.71,0,0,1,0,1,2.46,2.46,0,0,0-.67,1.69V25.24A6.78,6.78,0,0,1,5.18,30.7,13.46,13.46,0,0,0,0,41.6V77.9a9.34,9.34,0,0,0,9.34,9.34H22.23a9.34,9.34,0,0,0,9.34-9.34V75.27a2.49,2.49,0,0,0,.07-.57ZM5.77,45H25.88a.7.7,0,0,1,.7.7V71.51a.7.7,0,0,1-.7.7H5.77a.7.7,0,0,1-.7-.7V45.68A.7.7,0,0,1,5.77,45ZM13.18,5h5.21a.37.37,0,0,1,.37.37v1.2a.37.37,0,0,1-.37.37H13.18a.37.37,0,0,1-.37-.37V5.37A.37.37,0,0,1,13.18,5ZM8.33,34.59a11.83,11.83,0,0,0,4.48-9.35V16.83a.52.52,0,0,1,.52-.52h4.91a.52.52,0,0,1,.52.52v8.41a11.83,11.83,0,0,0,4.48,9.35,8.45,8.45,0,0,1,3.1,4.85.46.46,0,0,1-.46.55H5.68a.46.46,0,0,1-.46-.55A8.44,8.44,0,0,1,8.33,34.59ZM22.23,82.25H9.34A4.34,4.34,0,0,1,5,77.9H5a.7.7,0,0,1,.7-.7H25.88a.7.7,0,0,1,.7.7h0A4.34,4.34,0,0,1,22.23,82.25Z"/>
    <path fill="#f05135"
          d="M9.09,60.52a2.49,2.49,0,0,0,1-.22l13.39-6a2.5,2.5,0,0,0-2-4.57l-13.39,6a2.5,2.5,0,0,0,1,4.78Z"/>
    <path fill="#f05135" d="M21.46,57.87l-13.39,6a2.5,2.5,0,1,0,2,4.57l13.39-6a2.5,2.5,0,0,0-2-4.57Z"/>
</svg>'],
            ['name' => 'wine', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.11 62.14" height="20px">
    <path fill="#f05135"
          d="M28.61,0H2.5A2.5,2.5,0,0,0,0,2.5V24.86c0,6.92,5.66,12.66,13.05,13.73V57.14H6.75a2.5,2.5,0,1,0,0,5h17.6a2.5,2.5,0,0,0,0-5h-6.3V38.59c7.39-1.08,13.06-6.81,13.06-13.73V2.5A2.5,2.5,0,0,0,28.61,0Zm-2.5,24.86c0,4.92-4.74,8.93-10.56,8.93S5,29.78,5,24.86V5H26.11Z"/>
</svg>'],
            ['name' => 'cocktails', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.96 62.14" height="20px">
            <path fill="#f05153"
                  d="M30.13,19.06c0-6.92,3.6-15.5,3.64-15.58A2.5,2.5,0,0,0,31.46,0H2.5A2.5,2.5,0,0,0,.2,3.48c0,.09,3.64,8.67,3.64,15.58a12.55,12.55,0,0,1-1.51,6.23A21.65,21.65,0,0,0,0,35.89c0,.44,0,.86,0,1.22.4,7.69,5.86,12.7,14.43,13.51v6.52H8.18a2.5,2.5,0,1,0,0,5h17.6a2.5,2.5,0,0,0,0-5h-6.3V50.63c8.57-.81,14-5.82,14.43-13.46,0-.41,0-.83,0-1.27a21.65,21.65,0,0,0-2.32-10.6A12.55,12.55,0,0,1,30.13,19.06ZM27.86,5c-.38,1.13-.81,2.5-1.2,4H7.3c-.4-1.48-.82-2.85-1.2-4Zm1.06,31.86c-.42,8-8.49,8.9-11.94,8.9S5.46,44.89,5,36.81c0-.3,0-.6,0-.92A16.94,16.94,0,0,1,6.85,27.4a17.48,17.48,0,0,0,2-8.34A32.29,32.29,0,0,0,8.38,14h17.2a32.29,32.29,0,0,0-.45,5.08,17.48,17.48,0,0,0,2,8.34A16.94,16.94,0,0,1,29,35.89C29,36.21,28.95,36.51,28.92,36.86Z"/>
</svg>'],
            ['name' => 'date friendly', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.65 78.39" height="20px">
    <path fill="#f05135"
          d="M18.78,45a12.09,12.09,0,1,0-4,0A16.8,16.8,0,0,0,0,61.61V75.89a2.5,2.5,0,0,0,5,0V61.61a11.79,11.79,0,1,1,23.57,0V75.89a2.5,2.5,0,1,0,5,0V61.61A16.8,16.8,0,0,0,18.78,45ZM9.69,33a7.09,7.09,0,1,1,7.09,7.09A7.1,7.1,0,0,1,9.69,33Z"/>
    <path fill="#f05135"
          d="M77.63,3.24a3.18,3.18,0,0,0-3.35,2.18c-.41,1.25-1.69,2-3.79,2.32A12.62,12.62,0,0,0,61,14.16,15.9,15.9,0,0,0,59.15,21a12.08,12.08,0,0,0-1.5,24A16.8,16.8,0,0,0,42.86,61.61V75.89a2.5,2.5,0,0,0,5,0V61.61a11.79,11.79,0,1,1,23.57,0V75.89a2.5,2.5,0,0,0,5,0V61.61A16.8,16.8,0,0,0,61.64,45,12.07,12.07,0,0,0,67,23.46a24.21,24.21,0,0,1,6.08-2.3c3.32-.85,8.7-3.94,7.37-15.15A3.14,3.14,0,0,0,77.63,3.24Zm-18,36.89A7.09,7.09,0,1,1,66.74,33,7.1,7.1,0,0,1,59.64,40.13ZM71.85,16.31a29,29,0,0,0-7.41,2.86,11.37,11.37,0,0,1,1-2.66,7.61,7.61,0,0,1,5.72-3.82,11.7,11.7,0,0,0,4.37-1.45C75.2,14.07,74,15.78,71.85,16.31Z"/>
    <path fill="#f05135"
          d="M48.17,6.4A6.4,6.4,0,0,0,41.78,0a6.16,6.16,0,0,0-3.56,1.41A6.16,6.16,0,0,0,34.65,0a6.4,6.4,0,0,0-6.39,6.4c0,4.71,6.44,10.12,8.41,11.66a2.5,2.5,0,0,0,3.08,0C41.73,16.51,48.17,11.11,48.17,6.4Zm-10,6.43c-2.57-2.3-5-5.13-5-6.43A1.4,1.4,0,0,1,34.57,5a6.28,6.28,0,0,1,1.75,1.45,2.58,2.58,0,0,0,3.81,0A6.25,6.25,0,0,1,41.86,5a1.4,1.4,0,0,1,1.3,1.4C43.17,7.69,40.79,10.52,38.21,12.83Z"/>
</svg>'],
            ['name' => 'night view', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76.43 81.51"  height="20px">
            <path fill="#f05135"
                  d="M44.94,17.37A2.5,2.5,0,0,0,46.07,20a10.53,10.53,0,0,1-4,19.36,2.5,2.5,0,0,0-.94,4.6,15.64,15.64,0,0,0,8.2,2.33A15.53,15.53,0,1,0,47,15.4,2.5,2.5,0,0,0,44.94,17.37Zm9.13,4A10.53,10.53,0,0,1,50,41.26a15.49,15.49,0,0,0,4.11-19.89Z"/>
            <path fill="#f05135"
                  d="M32.26,14.56a2.49,2.49,0,0,0,0,2.41,2.48,2.48,0,0,0,2.11,3.65,2.49,2.49,0,0,0,4.23,0A2.48,2.48,0,0,0,40.67,17a2.49,2.49,0,0,0-2.11-3.66,2.49,2.49,0,0,0-4.22,0A2.49,2.49,0,0,0,32.26,14.56Z"/>
            <path fill="#f05135"
                  d="M24.8,9.57a2.49,2.49,0,0,0,2.07,1.24,2.49,2.49,0,0,0,4.23,0A2.48,2.48,0,0,0,33.2,7.16,2.49,2.49,0,0,0,31.09,3.5a2.49,2.49,0,0,0-4.22,0,2.49,2.49,0,0,0-2.11,3.66A2.49,2.49,0,0,0,24.8,9.57Z"/>
            <path fill="#f05135"
                  d="M35.18,25.83a2.49,2.49,0,0,0-2.07-1.24,2.49,2.49,0,0,0-4.22,0,2.49,2.49,0,0,0-2.11,3.66,2.48,2.48,0,0,0,2.11,3.65,2.49,2.49,0,0,0,4.23,0,2.48,2.48,0,0,0,2.11-3.65A2.49,2.49,0,0,0,35.18,25.83Z"/>
            <path fill="#f05135"
                  d="M38.53,32a2.49,2.49,0,0,0,2.07,1.24,2.49,2.49,0,0,0,4.23,0,2.48,2.48,0,0,0,2.11-3.65,2.49,2.49,0,0,0-2.11-3.66,2.49,2.49,0,0,0-4.22,0,2.49,2.49,0,0,0-2.11,3.66A2.49,2.49,0,0,0,38.53,32Z"/>
            <path fill="#f05135"
                  d="M51.5,10.88a2.49,2.49,0,0,0,2.07,1.24,2.49,2.49,0,0,0,4.23,0,2.48,2.48,0,0,0,2.11-3.65A2.49,2.49,0,0,0,57.8,4.81a2.49,2.49,0,0,0-4.22,0,2.49,2.49,0,0,0-2.11,3.66A2.49,2.49,0,0,0,51.5,10.88Z"/>
            <path fill="#f05135"
                  d="M39.95,7.24A2.49,2.49,0,0,0,42,8.48a2.49,2.49,0,0,0,4.23,0,2.48,2.48,0,0,0,2.11-3.65,2.49,2.49,0,0,0-2.11-3.66,2.49,2.49,0,0,0-4.22,0,2.49,2.49,0,0,0-2.11,3.66A2.49,2.49,0,0,0,39.95,7.24Z"/>
            <path fill="#f05135"
                  d="M73.93,47.53H59.64a2.5,2.5,0,0,0-2.5,2.5v5H47.86V50.69a2.5,2.5,0,0,0-2.5-2.5H33.57V40.84a2.5,2.5,0,0,0-2.5-2.5H19.32V31.89a2.5,2.5,0,0,0-2.5-2.5H2.5A2.5,2.5,0,0,0,0,31.89V79a2.5,2.5,0,0,0,2.5,2.5H73.93a2.5,2.5,0,0,0,2.5-2.5V50A2.5,2.5,0,0,0,73.93,47.53ZM5,34.39h9.32V76.51H5Zm14.32,9h9.25V76.51H19.32Zm14.25,9.86h9.29V76.51H33.57Zm14.29,6.89h9.29V76.51H47.86ZM71.43,76.51H62.14v-24h9.29Z"/>
            <rect fill="#f05135" x="39.08" y="66.35" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="53.3" y="66.35" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="20.36" y="61.21" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="48.8" y="61.21" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="63.2" y="61.21" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="20.36" y="45.82" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="24.85" y="45.82" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="6.07" y="61.21" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="10.57" y="45.82" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="6.07" y="40.68" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="10.57" y="35.55" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="24.85" y="56.08" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="34.59" y="56.08" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="39.08" y="56.08" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
            <rect fill="#f05135" x="67.69" y="56.08" width="2.68" height="2.68" rx="0.33" ry="0.33"/>
</svg>'],
            ['name' => 'open late', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.14 62.14" height="20px">
    <path fill="#f05135"
          d="M31.07,0A31.07,31.07,0,1,0,62.14,31.07,31.11,31.11,0,0,0,31.07,0ZM51,47.87a2.47,2.47,0,0,0-.61-1l-2.33-2.33a2.5,2.5,0,1,0-3.54,3.54l2.33,2.33a2.47,2.47,0,0,0,1,.61A26,26,0,0,1,33.27,57a2.47,2.47,0,0,0,.3-1.16V52.59a2.5,2.5,0,1,0-5,0v3.29a2.47,2.47,0,0,0,.3,1.16A26,26,0,0,1,14.27,51a2.47,2.47,0,0,0,1-.61l2.33-2.33a2.5,2.5,0,0,0-3.54-3.54l-2.33,2.33a2.47,2.47,0,0,0-.61,1A26,26,0,0,1,5.1,33.27a2.47,2.47,0,0,0,1.16.3H9.55a2.5,2.5,0,1,0,0-5H6.26a2.47,2.47,0,0,0-1.16.3,26,26,0,0,1,6.05-14.59,2.47,2.47,0,0,0,.61,1l2.33,2.33a2.5,2.5,0,1,0,3.54-3.54l-2.33-2.33a2.47,2.47,0,0,0-1-.61A26,26,0,0,1,28.87,5.1a2.47,2.47,0,0,0-.3,1.16V9.55a2.5,2.5,0,0,0,5,0V6.26a2.47,2.47,0,0,0-.3-1.16,26,26,0,0,1,14.6,6.05,2.47,2.47,0,0,0-1,.61l-2.33,2.33a2.5,2.5,0,1,0,3.54,3.54l2.33-2.33a2.47,2.47,0,0,0,.61-1A26,26,0,0,1,57,28.87a2.47,2.47,0,0,0-1.16-.3H52.59a2.5,2.5,0,0,0,0,5h3.29a2.47,2.47,0,0,0,1.16-.3A26,26,0,0,1,51,47.87Z"/>
    <path fill="#f05135"
          d="M44.52,25.67l-.06-.12,0,0a2.5,2.5,0,0,0-1-.95l-2.71-1.38a2.49,2.49,0,0,0-3.53,2.93l-3.62,1.35V23.81A2.49,2.49,0,0,0,35,19.58l-2.15-2.15a2.51,2.51,0,0,0-.38-.31l-.18-.1a2.47,2.47,0,0,0-.25-.13l-.24-.07-.23-.07a2.52,2.52,0,0,0-.46,0h0a2.51,2.51,0,0,0-.46,0l-.23.07-.24.07-.25.13-.19.1a2.51,2.51,0,0,0-.38.31h0l-2.15,2.15a2.49,2.49,0,0,0,1.42,4.23v7.26c0,.06,0,.12,0,.17a1.76,1.76,0,0,0,.1.54c0,.05,0,.11,0,.16l0,0,.07.15a2.49,2.49,0,0,0,.14.26l.09.13a2.46,2.46,0,0,0,.2.25l.08.09a2.51,2.51,0,0,0,.34.28l0,0a2.51,2.51,0,0,0,.34.18l.14.05.3.09.14,0a2.29,2.29,0,0,0,.92,0l.18-.05.22-.06,6.87-2.57A2.47,2.47,0,0,0,40.92,32a2.5,2.5,0,0,0,2.23-1.37l1.12-2.2A2.49,2.49,0,0,0,44.68,26,2.46,2.46,0,0,0,44.52,25.67Z"/>
</svg>'],
            ['name' => 'sports', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.91 63.44" height="20px">
    <path fill="#f05135"
          d="M38.35.08A44.12,44.12,0,0,0,2.16,57.43a8.68,8.68,0,0,0,9.4,5.93A44,44,0,0,0,43.09,43.16,44,44,0,0,0,47.74,6,8.67,8.67,0,0,0,38.35.08ZM6.92,55.89A39.12,39.12,0,0,1,39,5a3.68,3.68,0,0,1,4,2.51,39,39,0,0,1-4.12,32.95,39,39,0,0,1-28,17.92A3.68,3.68,0,0,1,6.92,55.89Z"/>
    <path fill="#f05135" d="M24.71,23.38l7.87,5a2.5,2.5,0,1,0,2.67-4.23l-7.87-5a2.5,2.5,0,1,0-2.67,4.23Z"/>
    <path fill="#f05135" d="M21.35,28.69l7.88,5a2.5,2.5,0,1,0,2.67-4.23l-7.88-5a2.5,2.5,0,1,0-2.67,4.23Z"/>
    <path fill="#f05135" d="M18,34l7.88,5a2.5,2.5,0,0,0,2.67-4.23l-7.87-5A2.5,2.5,0,0,0,18,34Z"/>
    <path fill="#f05135" d="M14.65,39.32l7.87,5a2.5,2.5,0,0,0,2.67-4.23l-7.87-5a2.5,2.5,0,1,0-2.67,4.23Z"/>
</svg>'],
            ['name' => 'food', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82.19 47.98" height="20px">
    <path fill="#f05135"
          d="M43.68,7.39A16.66,16.66,0,1,0,60.34,24,16.68,16.68,0,0,0,43.68,7.39Zm0,28.33A11.66,11.66,0,1,1,55.34,24,11.68,11.68,0,0,1,43.68,35.71Z"/>
    <path fill="#f05135"
          d="M43.68.12A23.93,23.93,0,1,0,67.61,24,24,24,0,0,0,43.68.12Zm0,42.86A18.93,18.93,0,1,1,62.61,24,18.95,18.95,0,0,1,43.68,43Z"/>
    <path fill="#f05135"
          d="M72.6.15a2.5,2.5,0,0,0-2.14,2.47v42a2.5,2.5,0,0,0,5,0V29.17l4.29-.11a2.5,2.5,0,0,0,2.43-2.5V5.41a4.79,4.79,0,0,0-1.68-3.73C78-.51,73.48,0,72.6.15Zm4.59,24-1.73,0V5a4.08,4.08,0,0,1,1.73.39Z"/>
    <path fill="#f05135"
          d="M15.57.12a2.5,2.5,0,0,0-2.5,2.5V14.41H11.41V2.62a2.5,2.5,0,0,0-5,0V14.41H5V2.62a2.5,2.5,0,0,0-5,0V16.91a2.5,2.5,0,0,0,2.5,2.5H6.41V44.66a2.5,2.5,0,0,0,5,0V19.41h4.16a2.5,2.5,0,0,0,2.5-2.5V2.62A2.5,2.5,0,0,0,15.57.12Z"/>
</svg>'],
            ['name' => 'live music', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76.43 75.02" height="20px">
    <path fill="#f05135"
          d="M40.72,32.33V2.5A2.5,2.5,0,0,0,38.22,0H11.43a2.5,2.5,0,0,0-2.5,2.5V25.66a7,7,0,1,0,5,6.68V13.93H35.72V25.66a7,7,0,1,0,5,6.68ZM7,30.37a2,2,0,1,1-2,2A2,2,0,0,1,7,30.37ZM35.72,5V8.93H13.93V5Zm-2,25.37a2,2,0,1,1-2,2A2,2,0,0,1,33.75,30.37Z"/>
    <path fill="#f05135"
          d="M73.93,35.72H47.15a2.5,2.5,0,0,0-2.5,2.5V61.37a7,7,0,1,0,5,6.68V49.65H71.43V61.37a7,7,0,1,0,5,6.68V38.22A2.5,2.5,0,0,0,73.93,35.72ZM69.47,66.09a2,2,0,1,1-2,2A2,2,0,0,1,69.47,66.09Zm-26.79,0a2,2,0,1,1-2,2A2,2,0,0,1,42.68,66.09ZM71.43,40.72v3.93H49.65V40.72Z"/>
</svg>'],
            ['name' => 'price fair', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.83 42.66" height="20px">
    <path fill="#f05135"
          d="M13.91,17.65V11.5a3.2,3.2,0,0,1,2.14,2.69,2.5,2.5,0,0,0,5,0c0-3.8-3-7-7.14-7.93V2.5a2.5,2.5,0,0,0-5,0V6.25c-4.11.94-7.14,4.14-7.14,7.93s3,7,7.14,7.93v9.19C6.64,30.59,5,28.93,5,27.06a2.5,2.5,0,0,0-5,0c0,4.59,3.82,8.44,8.91,9.4v3.7a2.5,2.5,0,0,0,5,0v-3.7c5.09-1,8.91-4.81,8.91-9.4S19,18.62,13.91,17.65ZM6.77,14.19A3.2,3.2,0,0,1,8.91,11.5v5.39A3.2,3.2,0,0,1,6.77,14.19Zm7.14,17.13V22.8c2.28.72,3.91,2.38,3.91,4.26S16.19,30.6,13.91,31.32Z"/>
</svg>'],
            ['name' => 'price moderate', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.33 42.66" height="20px">
            <path fill="#f05135"
                  d="M13.91,17.65V11.5a3.2,3.2,0,0,1,2.14,2.69,2.5,2.5,0,0,0,5,0c0-3.8-3-7-7.14-7.93V2.5a2.5,2.5,0,0,0-5,0V6.25c-4.11.94-7.14,4.14-7.14,7.93s3,7,7.14,7.93v9.19C6.64,30.59,5,28.93,5,27.06a2.5,2.5,0,0,0-5,0c0,4.59,3.82,8.44,8.91,9.4v3.7a2.5,2.5,0,0,0,5,0v-3.7c5.09-1,8.91-4.81,8.91-9.4S19,18.62,13.91,17.65ZM6.77,14.19A3.2,3.2,0,0,1,8.91,11.5v5.39A3.2,3.2,0,0,1,6.77,14.19Zm7.14,17.13V22.8c2.28.72,3.91,2.38,3.91,4.26S16.19,30.6,13.91,31.32Z"/>
            <path fill="#f05135"
                  d="M41.41,17.65V11.5a3.2,3.2,0,0,1,2.14,2.69,2.5,2.5,0,0,0,5,0c0-3.8-3-7-7.14-7.93V2.5a2.5,2.5,0,0,0-5,0V6.25c-4.11.94-7.14,4.14-7.14,7.93s3,7,7.14,7.93v9.19c-2.28-.72-3.91-2.38-3.91-4.26a2.5,2.5,0,1,0-5,0c0,4.59,3.82,8.44,8.91,9.4v3.7a2.5,2.5,0,0,0,5,0v-3.7c5.09-1,8.91-4.81,8.91-9.4S46.51,18.62,41.41,17.65Zm-7.14-3.47a3.2,3.2,0,0,1,2.14-2.69v5.39A3.2,3.2,0,0,1,34.27,14.19Zm7.14,17.13V22.8c2.28.72,3.91,2.38,3.91,4.26S43.69,30.6,41.41,31.32Z"/>
</svg>'],
            ['name' => 'price expensive', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.83 42.66" height="20px">
    <path fill="#f05135"
          d="M13.91,17.65V11.5a3.2,3.2,0,0,1,2.14,2.69,2.5,2.5,0,0,0,5,0c0-3.8-3-7-7.14-7.93V2.5a2.5,2.5,0,0,0-5,0V6.25c-4.11.94-7.14,4.14-7.14,7.93s3,7,7.14,7.93v9.19C6.64,30.59,5,28.93,5,27.06a2.5,2.5,0,0,0-5,0c0,4.59,3.82,8.44,8.91,9.4v3.7a2.5,2.5,0,0,0,5,0v-3.7c5.09-1,8.91-4.81,8.91-9.4S19,18.62,13.91,17.65ZM6.77,14.19A3.2,3.2,0,0,1,8.91,11.5v5.39A3.2,3.2,0,0,1,6.77,14.19Zm7.14,17.13V22.8c2.28.72,3.91,2.38,3.91,4.26S16.19,30.6,13.91,31.32Z"/>
    <path fill="#f05135"
          d="M41.41,17.65V11.5a3.2,3.2,0,0,1,2.14,2.69,2.5,2.5,0,0,0,5,0c0-3.8-3-7-7.14-7.93V2.5a2.5,2.5,0,0,0-5,0V6.25c-4.11.94-7.14,4.14-7.14,7.93s3,7,7.14,7.93v9.19c-2.28-.72-3.91-2.38-3.91-4.26a2.5,2.5,0,1,0-5,0c0,4.59,3.82,8.44,8.91,9.4v3.7a2.5,2.5,0,0,0,5,0v-3.7c5.09-1,8.91-4.81,8.91-9.4S46.51,18.62,41.41,17.65Zm-7.14-3.47a3.2,3.2,0,0,1,2.14-2.69v5.39A3.2,3.2,0,0,1,34.27,14.19Zm7.14,17.13V22.8c2.28.72,3.91,2.38,3.91,4.26S43.69,30.6,41.41,31.32Z"/>
    <path fill="#f05135"
          d="M68.91,17.65V11.5a3.2,3.2,0,0,1,2.14,2.69,2.5,2.5,0,0,0,5,0c0-3.8-3-7-7.14-7.93V2.5a2.5,2.5,0,1,0-5,0V6.25c-4.11.94-7.14,4.14-7.14,7.93s3,7,7.14,7.93v9.19C61.64,30.59,60,28.93,60,27.06a2.5,2.5,0,1,0-5,0c0,4.59,3.82,8.44,8.91,9.4v3.7a2.5,2.5,0,1,0,5,0v-3.7c5.09-1,8.91-4.81,8.91-9.4S74,18.62,68.91,17.65Zm-7.14-3.47a3.2,3.2,0,0,1,2.14-2.69v5.39A3.2,3.2,0,0,1,61.77,14.19Zm7.14,17.13V22.8c2.28.72,3.91,2.38,3.91,4.26S71.19,30.6,68.91,31.32Z"/>
</svg>'],
            ['name' => 'outdoor seating', 'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67.4 79.7" height="20px">
    <path fill="#f05153"
          d="M41.08,74.7c-.12,0-.41,0-.88-.48C37.79,71.79,36.52,64,36,56.8H51.08a2.5,2.5,0,0,0,0-5H35.76c0-1.12,0-2.18,0-3.15a2.25,2.25,0,0,0,0-.36V36.8a4,4,0,0,0,.4,0h4.12a4.13,4.13,0,0,0,2.91-1.2,4.12,4.12,0,0,0,2.9,1.2h4.12a4.12,4.12,0,0,0,2.91-1.2A4.12,4.12,0,0,0,56,36.85h4.12a4.25,4.25,0,0,0,4.19-4.29V29.89c0-.26,0-.5,0-.76C64.18,16,51.13,4.51,35.7,3.37V2.5a2.5,2.5,0,0,0-5,0v.87C15.26,4.51,2.21,16,2.15,29.13c0,.25,0,.5,0,.76v2.66a4.25,4.25,0,0,0,4.19,4.29h4.11a4.14,4.14,0,0,0,2.91-1.2,4.13,4.13,0,0,0,2.91,1.2h4.11a4.14,4.14,0,0,0,2.91-1.2,4.14,4.14,0,0,0,2.91,1.2h4.11a4,4,0,0,0,.41,0V48.24a2.51,2.51,0,0,0,0,.41c0,1,0,2,0,3.15H15.31a2.5,2.5,0,0,0,0,5H30.39c-.51,7.2-1.79,15-4.2,17.42-.47.48-.76.48-.88.48a2.5,2.5,0,1,0,0,5H41.08a2.5,2.5,0,1,0,0-5ZM29.48,31.85H27a2.5,2.5,0,0,0-2.49-2.29H22.06a2.5,2.5,0,0,0-2.49,2.29H17a2.5,2.5,0,0,0-2.49-2.29H12.13a2.5,2.5,0,0,0-2.49,2.29H7.13v-2c0-.15,0-.29,0-.44s0-.15,0-.22c0-11.17,12.17-21,26.05-21s26,9.79,26,21c0,.07,0,.15,0,.22s0,.29,0,.44v2H56.76a2.5,2.5,0,0,0-2.49-2.29H51.84a2.5,2.5,0,0,0-2.49,2.29H46.83a2.5,2.5,0,0,0-2.49-2.29H41.91a2.5,2.5,0,0,0-2.49,2.29H36.9a2.5,2.5,0,0,0-2.49-2.29H32A2.5,2.5,0,0,0,29.48,31.85ZM31.82,74.7a23.34,23.34,0,0,0,1.38-3.64,23.25,23.25,0,0,0,1.38,3.64Z"/>
    <path fill="#f05153"
          d="M65.18,41.27a2.5,2.5,0,0,0-2.76,2.21L60.54,60.42h-11A2.5,2.5,0,0,0,47,62.79l-.71,14.29a2.5,2.5,0,0,0,5,.25l.59-11.91H60.4L61,77.33a2.5,2.5,0,0,0,2.5,2.38h.13A2.5,2.5,0,0,0,66,77.08L65.28,63l2.1-19A2.5,2.5,0,0,0,65.18,41.27Z"/>
    <path fill="#f05153"
          d="M17.88,60.42h-11L5,43.47A2.5,2.5,0,1,0,0,44l2.1,19-.7,14.09a2.5,2.5,0,0,0,5,.25L7,65.42H15.5l.59,11.91a2.5,2.5,0,0,0,2.5,2.38h.13a2.5,2.5,0,0,0,2.37-2.62l-.71-14.29A2.5,2.5,0,0,0,17.88,60.42Z"/>
</svg>']
        ])->map(function ($feature) {
            return [
                'label'      => $feature['name'],
                'short_name' => str_replace(' ', '_', $feature['name']),
                'icon'       => $feature['svg']
            ];
        })->map(function ($feature_attributes) {
            return factory(\App\Establishments\Feature::class)->create($feature_attributes);
        });

        $establishments = factory(\App\Establishments\Establishment::class, 40)->create(['published' => true]);

        $establishments->each(function ($establishment) use ($features) {
            $establishment->addFeatures($features->random(6)->pluck('id')->all());
        });
    }
}
