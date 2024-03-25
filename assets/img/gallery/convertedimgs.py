from PIL import Image
import os

def resize_image(image_path, dimensions):
    with Image.open(image_path) as img:
        resized_img = img.resize(dimensions)
        return resized_img

def generate_thumbnails(source_path, output_path, dimensions=(2048, 1536), thumbnail_size=(140, 92)):
    # Ensure output directory exists
    if not os.path.exists(output_path):
        os.makedirs(output_path)

    # List all files in the source directory
    files = os.listdir(source_path)

    for file_name in files:
        # Check if the file is an image (you might want to enhance this check)
        if file_name.lower().endswith(('.png', '.jpg', '.jpeg', '.gif')):
            # Open the image
            image_path = os.path.join(source_path, file_name)
            
            # Resize the image
            resized_img = resize_image(image_path, dimensions)
            
            # Save the resized image
            resized_img.save(os.path.join(output_path, file_name))

            # Generate and save thumbnail
            thumbnail = resized_img.copy()
            thumbnail.thumbnail(thumbnail_size)
            thumbnail_name = os.path.splitext(file_name)[0] + "-min" + os.path.splitext(file_name)[1]
            thumbnail.save(os.path.join(output_path, thumbnail_name))

# Example usage:
source_directory = "./"
output_directory = "./"

generate_thumbnails(source_directory, output_directory)
