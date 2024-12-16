import boto3
import sys
from botocore.exceptions import NoCredentialsError

# AWS Configuration
BUCKET_NAME = 'myawss3bucketreports'
REGION_NAME = 'eu-north-1'
AWS_ACCESS_KEY = 'AKIA2OAJT3BMA6OB26WW'
AWS_SECRET_KEY = 'masked'

def upload_to_s3(file_path, bucket_name, s3_key):
    try:
        s3 = boto3.client(
            's3',
            region_name=REGION_NAME,
            aws_access_key_id=AWS_ACCESS_KEY,
            aws_secret_access_key=AWS_SECRET_KEY
        )
        s3.upload_file(file_path, bucket_name, s3_key)
        print(f"File uploaded successfully to s3://{bucket_name}/{s3_key}")
    except FileNotFoundError:
        print("Error: The file was not found.")
    except NoCredentialsError:
        print("Error: AWS credentials are not available.")
    except Exception as e:
        print(f"An error occurred: {e}")

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python upload.py <file_path>")
        sys.exit(1)

    file_path = sys.argv[1]
    s3_key = f"reports/{file_path.split('/')[-1]}"
    upload_to_s3(file_path, BUCKET_NAME, s3_key)
