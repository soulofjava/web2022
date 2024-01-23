<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

        'gcs' => [
            'driver' => 'gcs',
            'url' => 'https://storage.googleapis.com/web_opd',
            // 'key_file_path' => env('GOOGLE_CLOUD_KEY_FILE', null), // optional: /path/to/service-account.json
            'key_file' => [
                "type" => "service_account",
                "project_id" => "diskominfo-wonosobo",
                "private_key_id" => "d4b3ffdef02a35ffcb3c336cf18825e826385488",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC2MzPHUqnPDCco\nCf4FxLJ/h/YpQcfHjVDYDpxHLio3OYGZks87KAqOCIWC7bS31ID6ahnE0BtMaJ1C\ng5WY5UoZnpDUiTSKC8BTxOqgb75pc+A9gkHLsynsRTZpDQ6YrE5zxtbJQbyQq0vv\n16pEjEcfFXmEnJMfVx8c6lpi6g9upyZglKeZEFjKZeE7nshOVv0WttHzw0ScKwrH\nJyyku07aUQOabzQZmE9trzoIMxlvOQi19qpDAElGpMpxbLUj+RvvkFrXshOwjrbC\n2DWbji/xOHhb1N4/Uwi0f+vxTjTBBCTKduMr6Mnw9in7NGDjvlkJcdWa8XDIGLwZ\njsgHSzr5AgMBAAECggEAARAUe3NhXh3HvYbCZTRNUhZf/UQJl0HH0LzUFKEMWhOz\nLHXJZkKmE3JGshmddLblVOCee3IMfgzRrFrHZNO4k7nuWxkHoLhaaWVZijD2Axg2\nkjFIHY5d3nJAaSA2/1++ROlfj8oQVdEz/BINskDrD3S7p4ZWIDLiRvPx2J1y1INx\nUtE76s5yx19hkUGO+YDqn9zSBjB2nQXtjEwmkJhpeZ0oYX7Uag7zizhEFJIZPOL+\nbcWRko7XQ5ZHvbPRtwb2yFj9xZhUwwMoGmMJXCoIYbTe2oM6aj4ieVjcmUnXgbNm\nQdgk9Pv5nMZJqdMg+NxQu68wQ7M3UsV3IFO6F5DbMQKBgQDifRNMmIIinqCS+ogf\nv5XaFHFFrFgyOGiRragIjuPD07bLzQ+DC/6EO6pB2+WRR/THuvxeTNEt84anDMMy\nb34KChyEBJQad5C9Y+6+Naj96LAbtuToI93Sdz4fpIPKwuBAafkkIbUepA61OOZB\nJqP5hdT1grk3OAYxJqMtbEJjiQKBgQDN8M3KBk9DfQ2yDRtNlXCqZbkcG1dzDQpw\nsJBkkb3wEbPAcml9Zdxa4yDr5N2iR4iR1GQfEP/87pXebmpXFefuVf4nEYxkv/PT\nAR+1tUOrIoIEDN997OJbx5CvYHIL4QSH1JnkkMMwB7DIMbByZCeQUJOslB37PQKt\n6NWdlyKP8QKBgQCpLtsKvWWAbNPv1tt2M8vBcsHGVN4w7XgXUgwSEILNFkoW5N/w\neTYvGs6skZFju8d6pw+7dVBQLfhospzhAO26nCD+8NidCLGC97IwPa81s+pRWYaW\nbaxWeiJayq5z+KxBEag8uD0uXUhrUMyW4EFes/0HRBYMzHm7n2wHEzZoWQKBgEab\nCaL6+M/1nu1tiu/VjXQOPiHBygCa9vpdvpOMWCdnmk4fq8UfWCYc+tuFcutBRTRi\nMhVomatZDS7egjzrOMJA30r7vDuKiAjOuNVumQ2iXhsPYsxkm9LFn/hQw6kI86my\nHTT84L6l1Fk+l/UQG3Rh+89OVN0fNLz1N8+40lOxAoGAa1uqw8WvYu+aEW8fVMQQ\n5SVUs7baM+ukOnvRXt7025WpTTT9t8yizlSU3cCqs0Ys9sebYHxbv8FHYAUnA8W4\nx+H5lUR4EAfGszlKmrlrCa/et4GrT/3IhHzuj7UdpYQkCTOAMRI0b2UJViN79/NF\nHAIEmpcbtd7SiqpkzkOQNDw=\n-----END PRIVATE KEY-----\n",
                "client_email" => "isa-389@diskominfo-wonosobo.iam.gserviceaccount.com",
                "client_id" => "109661616418836414203",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/isa-389%40diskominfo-wonosobo.iam.gserviceaccount.com",
                "universe_domain" => "googleapis.com",
                // "type" => "service_account",
                // "project_id" => "diskominfo-wonosobo",
                // "private_key_id" => "05ad00f42687799986c7989610149b8dddf1a395",
                // "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDQMnUmYf5CUDwm\n/ftw38ZL3bingjYVrP+RwZIRk+nyuAy13fguJEDECGkUWr3JuAbKVcBw+RdoGjxa\nxj9/28oxJ21diaUwAn/dzPR2kHZnYVo7xG5fhPKEWi5lQp7xn7k7nqbmcxgJ689i\nFjzni69NIWzEDa+CmuSPCFeT56rI7MtY/AMw5Zvve2NWUdFYfdK+o/hWm1iiglpO\ni0MyYKoz3SLCDaI4E+7ITdwNFJKK/y6gO15OtcXVFpjaKMYdemoxCs44i9CLYuPi\nUA/ON+Z9P0J+u5XP76Xy8UzYIVjKDB8smiDTl35ggKupYsuGs2zuJ6+Jz6yAH6j+\n0Eb/xJ1PAgMBAAECgf9nB2Tns0g5jDbi8sL4CVEq9cnoCiNMcS+2H7o7/3a3SKvc\nBcQ6S1N9XVbLyzPR5T4a2Mw4SFP18UoLjWHAbnZamImV9UwgzRvZbwKOn7g8u8Jy\ncbNnIPtrOMF8FpITM6duWZgmiqHypoAyf9xme+fLQenk5NoPjB/W5ewRcC8BNF/i\nG80aO/Pq2n/Hge6omZeSDEvF7c5ATsa8v039dscjCDRcD7juAK51x6HOAd7fHSJT\njPo37COxFVGuhjm3bgpAHVHCIMsb3TA8dH4LH+r8gyqRLNxso+zCHFxn6rodKZkq\n30D+9x3V/2bsrGswLKiuovpPnHHlSuxn2RQ2+uUCgYEA/Wvy1nnr5wWPtyF081zk\nJlFL8AFluT5FvmHA3caDd3DK/rUU/FvHaZrUOITVkhqJWKTwkyhr4qZUNzu7f2I9\nVo0gHMghSTJFfsyq0bIDtikaXZwp9cEnRouUt1Y9QxOh/VYQKYaykyStd7ZgNrry\nu8MiI36rUgZ+cqV2+hxekaMCgYEA0lC4ESSdxdnc+3J7S9FGXu5Y6Jdph+kNf1CR\nMSgxRYopEQ8kQ8dTtHUPdVslBknNMAL8/NdVCGA/k98ArlbmAOaZNfW3L2YDKGUU\ninhQnGpkTlrd5fLvKmVj4x+pIlO3Wnc/QADqkKznSwj9vQumDtRCp3TLgNr3dX5b\n6v+YuGUCgYEArmIe2zlQfEtWZpTuLhyonjlpAMFlZ0ATq/sGRVW513HVLcobo7/g\nC6pQCIhXkk8SXd458XlqK6962fsPfYtzW+CGzWdliEHAko1xqhRN+4ZzLyEruoFs\nbl3UOwhr5YFYAcS8IGcg8KHXgD4OHPst1shi8HvUlgAD+Q4lPdxRsvMCgYEAtNvh\nTiy02L2/gSQzz0FKSLyjDHGYuN27U67PDPzJUkm7gwYIY5j37Il2H6+fqUayAwWu\n1Se/4hIS2nC9Py9PX5ruSi7htwr80DIMdf99IuWDGLafd+1vqn/CZECHzBM967f8\nVmfzTzLBPA+hVH698KasIyEXF9o1T364QOBITtkCgYEAm2VyR4qqWY+9nEJhJKsS\nI+pbBhWMQ9cEr2jxKvqGbmGrbYztX3Q7gtnxhdJX7KHxVYX/P2ZwUt4JQ5NnYaKY\nIp2wPYHqDHNcu18yxEEgHzKU4p1YYotSvJjrgJjO0+nQ93NYdOkMXOpzB9dhBQbc\nI28dXeflvGFLEHOGrUjCzgA=\n-----END PRIVATE KEY-----\n",
                // "client_email" => "mpp-bucket-akses@diskominfo-wonosobo.iam.gserviceaccount.com",
                // "client_id" => "113110685564835579617",
                // "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                // "token_uri" => "https://oauth2.googleapis.com/token",
                // "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                // "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/mpp-bucket-akses%40diskominfo-wonosobo.iam.gserviceaccount.com"
            ], // optional: Array of data that substitutes the .json file (see below)
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'web_opd'),
            'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', ''), // optional: /default/path/to/apply/in/bucket
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', null), // see: Public URLs below
            'apiEndpoint' => env('GOOGLE_CLOUD_STORAGE_API_ENDPOINT', null), // set storageClient apiEndpoint
            'visibility' => 'noPredefinedVisibility', // optional: public|private
            'visibility_handler' => \League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility::class, // optional: set to \League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility::class to enable uniform bucket level access
            'metadata' => ['cacheControl' => 'public,max-age=86400'], // optional: default metadata
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
