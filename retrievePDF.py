import boto3
import sys
import os

# AWS S3 Configuration
BUCKET_NAME = 'myawss3bucketreports'
REGION_NAME = 'eu-north-1'

s3_client = boto3.client(
    's3',
    region_name=REGION_NAME,
    aws_access_key_id='AKIA2OAJT3BMA6OB26WW',
    aws_secret_access_key='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'
)

def download_pdf_from_s3(pdf_file_path, warehouse_name):
    """Download the PDF from S3 and return the local file path."""
    # Extract the S3 object key from the file path
    pdf_key = pdf_file_path.split(f"s3://{BUCKET_NAME}/")[-1]

    # Temporary directory
    temp_dir = os.path.join(os.getcwd(), "temp")  # Create a "temp" folder in the current working directory

    # Ensure the temp directory exists
    if not os.path.exists(temp_dir):
        os.makedirs(temp_dir)

    # Temporary file to save the downloaded PDF
    temp_pdf_path = os.path.join(temp_dir, f"{warehouse_name}_{os.path.basename(pdf_key)}")

    # Download the PDF from S3
    s3_client.download_file(BUCKET_NAME, pdf_key, temp_pdf_path)
    return temp_pdf_path

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Error: PDF file path and warehouse name are required.")
        sys.exit(1)

    pdf_file_path = sys.argv[1]
    warehouse_name = sys.argv[2]

    try:
        temp_pdf_path = download_pdf_from_s3(pdf_file_path, warehouse_name)
        print(temp_pdf_path)  # Output the local path for PHP to read
    except Exception as e:
        print(f"Error retrieving the PDF: {str(e)}")
        sys.exit(1)
